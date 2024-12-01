<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Event;
use App\Services\EventRegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RuntimeException;

class EventRegistrationController extends Controller
{
    public function __construct(
        private readonly EventRegistrationService $registrationService
    ) {}

    public function register(Request $request, Event $event): JsonResponse
    {
        try {
            $this->registrationService->register($request->user(), $event);
        } catch (RuntimeException $e) {
            return ApiResponse::error($e->getMessage(), null, 409);
        }

        return ApiResponse::success(
            [
                'event_id' => $event->id,
                'user_id' => $request->user()->id,
            ],
            'Successfully registered for the event.',
            201
        );
    }

    public function unregister(Request $request, Event $event): JsonResponse
    {
        try {
            $this->registrationService->unregister($request->user(), $event);
        } catch (RuntimeException $e) {
            return ApiResponse::error($e->getMessage(), null, 404);
        }

        return ApiResponse::success(null, 'Successfully unregistered from the event.');
    }
}
