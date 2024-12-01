<?php

namespace App\Services;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\QueryException;

class EventRegistrationService
{
    /**
     * @throws \RuntimeException When already registered (or unique constraint race).
     */
    public function register(User $user, Event $event): void
    {
        if ($event->attendees()->whereKey($user->id)->exists()) {
            throw new \RuntimeException('You are already registered for this event.');
        }

        try {
            $event->attendees()->attach($user->id);
        } catch (QueryException $e) {
            if ($this->isDuplicateKey($e)) {
                throw new \RuntimeException('You are already registered for this event.');
            }

            throw $e;
        }
    }

    /**
     * @throws \RuntimeException When not registered.
     */
    public function unregister(User $user, Event $event): void
    {
        $detached = $event->attendees()->detach($user->id);

        if ($detached === 0) {
            throw new \RuntimeException('You are not registered for this event.');
        }
    }

    private function isDuplicateKey(QueryException $e): bool
    {
        $message = strtolower($e->getMessage());

        return $e->getCode() === '23000'
            || str_contains($message, 'unique')
            || str_contains($message, 'duplicate');
    }
}
