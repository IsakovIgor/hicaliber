<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Filters\RoomFilters;
use App\Models\Room;
use Illuminate\Http\JsonResponse;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    /**
     * @param RoomFilters $filters
     * @return JsonResponse
     */
    public function search(RoomFilters $filters): JsonResponse
    {
        // sleep for loading
        sleep(1);
        return response()->json([
            'data' => Room::filters($filters)->get(),
        ]);
    }
}
