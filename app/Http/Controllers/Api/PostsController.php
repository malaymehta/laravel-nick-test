<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreNewsRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * @param StoreNewsRequest $request
     * @return JsonResponse
     */
    public function store(StoreNewsRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $post = Post::query()->updateOrCreate($request->validated());
            DB::commit();
            $response = [
                'status' => 200,
                'message' => 'Post Created Successfully',
                'data' => compact('post')
            ];
        } catch (Exception $e) {
            DB::rollBack();
            $response = [
                'status' => 100,
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
        return response()->json($response);
    }
}
