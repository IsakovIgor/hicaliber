<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Filters\RoomFilters;
use App\Models\Room;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    public function search(RoomFilters $filters)
    {
        return response()->json([
            'data' => Room::filters($filters)->get(),
        ]);
    }
}
