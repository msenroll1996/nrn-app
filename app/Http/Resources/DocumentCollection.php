<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\DocumentCategory;
use App\Models\Period;

class DocumentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
     public static $wrap = '';
    public function toArray($request)
    {
        $categories = DocumentCategory::has('documents')->get();
        $periods = Period::has('documents')->orderBy('from_date','desc')->get();
        return [
            'documents' => $this->collection,
            'categories' => DocumentCategoryResource::collection($categories),
            'periods' => PeriodResource::collection($periods),
        ];
    }
}
