<?php

namespace App\JsonApi\V1\Posts;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *      the allowed paths, an empty array for none allowed, or null to allow all paths.
     */
    protected $allowedIncludePaths = [];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = [];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedSortParameters = ['title', 'content', 'status','created_at', 'updated_at', 'user_id'];

   /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = ['title', 'content', 'status'];

    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *      the record being updated, or null if creating a resource.
     * @return array
     */

    protected function rules($record, array $data): array
    {
        if ($record) {
            return [
                'id' => 'not_in:1',
                'title' => 'sometimes',
                'content' => 'sometimes',
                'status' => 'sometimes',
                'user_id' => 'sometimes',
            ];
        }

        return [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ];
    }


    /**
     * Get query parameter validation rules.
     *
     * @return array
     */
    protected function queryRules(): array
    {
        return [
            //
        ];
    }

}
