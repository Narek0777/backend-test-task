<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Requests\PatchEventRequest;

class EventController extends BaseController
{
      public function index(Request $request)
        {
            $organizationId = Auth::user()->id;

            // Retrieve events for the specific organization
            $events = Event::where('organization_id', $organizationId)->get();

            return $this->sendResponse($events,'Events Fetched Successfully');
        }

        public function show(Event $event)
        {
            return $this->sendResponse($event, 'Event Fetched Successfully');
        }

        public function update(UpdateEventRequest $request, Event $event)
        {
            $data = $request->validated();

            // Perform validation and update the event data
            $event->update($data);

            return response()->json($event);
        }

        public function partialUpdate(PatchEventRequest $request, Event $event)
        {
            $data = $request->validated();

            // Perform validation and update specific columns
            $event->update($data);

            return response()->json($event);
        }

        public function destroy(Event $event)
        {
            // Delete the event
            $event->delete();

            return $this->sendResponse($event,'Event deleted successfully');
        }
}
