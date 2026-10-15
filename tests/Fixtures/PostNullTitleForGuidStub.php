<?php

declare(strict_types=1);

namespace Tests\Modules\Lang\Fixtures;

use Modules\Lang\Models\Post;

final class PostNullTitleForGuidStub extends Post
{
    protected function titleForGuid(): null
    {
        return null;
    }
}
