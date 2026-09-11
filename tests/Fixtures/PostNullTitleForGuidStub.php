<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Fixtures;

use Modules\Lang\Models\Post;

final class PostNullTitleForGuidStub extends Post
{
<<<<<<< HEAD
    protected function titleForGuid(): ?string
=======
    protected function titleForGuid(): null
>>>>>>> laraxot/dev
    {
        return null;
    }
}
