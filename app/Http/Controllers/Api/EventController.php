<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\ListEventsRequest;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Http\Responses\ApiResponse;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    public function __construct(
        private readonly EventService $eventService
    ) {}

    public function index(ListEventsRequest $request): JsonResponse
    {
        $paginator = $this->eventService->paginate($request->filters());

        return ApiResponse::success([
            'events' => EventResource::collection($paginator->items())->resolve(),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'from' => $paginator->firstItem(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'to' => $paginator->lastItem(),
                'total' => $paginator->total(),
            ],
            'links' => [
                'first' => $paginator->url(1),
                'last' => $paginator->url($paginator->lastPage()),
                'prev' => $paginator->previousPageUrl(),
                'next' => $paginator->nextPageUrl(),
            ],
        ]);
    }

    public function show(Event $event): JsonResponse
    {
        $event = $this->eventService->loadForView($event);

        return ApiResponse::success(
            new EventResource($event),
            'Event retrieved successfully.'
        );
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        $event = $this->eventService->create($request->user(), $request->validated());

        return ApiResponse::success(
            new EventResource($event),
            'Event created successfully.',
            201
        );
    }

    public function update(UpdateEventRequest $request, Event $event): JsonResponse
    {
        $this->authorize('update', $event);

        $event = $this->eventService->update($event, $request->validated());

        return ApiResponse::success(
            new EventResource($event),
            'Event updated successfully.'
        );
    }

    public function destroy(Event $event): JsonResponse
    {
        $this->authorize('delete', $event);

        $this->eventService->delete($event);

        return ApiResponse::success(null, 'Event deleted successfully.');
    }
}
