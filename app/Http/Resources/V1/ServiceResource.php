<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

class ServiceResource extends JsonApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   
    
   
       public function toAttributes(Request $request):array{

        return [
            'name' => $this->name,
            'url' => $this->url,
            'created' => new DateResource($this->created_at),
        ];
       }

       public function toRelationships(Request $request): array
      {

        return[
            
           'checks'=> fn() => CheckResource::collection(
            $this->checks
           )
        ];
     }

       public function toLinks($request): array
    {
        return [
            Link::self(route('services.index', $this->resource)),
        ];
    }
    
}
