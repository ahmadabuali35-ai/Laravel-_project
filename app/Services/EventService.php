<?php

namespace App\Services;

use App\Models\Event;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class EventService
{
    /**
     * @param  array{search?: string, date?: string, date_from?: string, date_to?: string, per_page?: int}  $filters
     */
    public function paginate(array $filters): LengthAwarePaginator
    {
        $perPage = min(max((int) ($filters['per_page'] ?? 15), 1), 100);

        $query = Event::query()
            ->with(['owner:id,name,email'])
            ->withCount(['attendees as registrations_count']);

        $query = $this->applyFilters($query, $filters);

        return $query
            ->orderByDesc('date')
            ->paginate($perPage);
    }

    public function loadForView(Event $event): Event
    {
        return $event->load(['owner:id,name,email'])
            ->loadCount(['attendees as registrations_count']);
    }

    /**
     * @param  array{title: string, description?: string|null, date: string, location: string}  $data
     */
    public function create(User $owner, array $data): Event
    {
        $event = $owner->ownedEvents()->create($data);
        $event->load(['owner:id,name,email'])->loadCount(['attendees as registrations_count']);

        return $event;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(Event $event, array $data): Event
    {
        $event->update($data);
        $event->load(['owner:id,name,email'])->loadCount(['attendees as registrations_count']);

        return $event;
    }

    public function delete(Event $event): void
    {
        $event->delete();
    }

    /**
     * @param  array{search?: string, date?: string, date_from?: string, date_to?: string, per_page?: int}  $filters
     */
    private function applyFilters(Builder $query, array $filters): Builder
    {
        if (! empty($filters['search'])) {
            $search = trim($filters['search']);
            $query->where('title', 'like', '%'.$search.'%');
        }

        if (! empty($filters['date'])) {
            $query->whereDate('date', $filters['date']);

            return $query;
        }

        if (! empty($filters['date_from'])) {
            $query->whereDate('date', '>=', $filters['date_from']);
        }

        if (! empty($filters['date_to'])) {
            $query->whereDate('date', '<=', $filters['date_to']);
        }

        return $query;
    }
}
