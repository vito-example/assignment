<?php
/**
 *  app/Http/Requests/v1/CommentRequest.php
 *
 * Date-Time: 14.06.21
 * Time: 10:18
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Requests\v1;

use App\Exceptions\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class CommentRequest
 * @package App\Http\Requests\v1
 */
class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sort' => 'nullable|in:created_at,id,content',
            'order' => 'nullable|in:asc,desc',
            'limit' => 'nullable|numeric',
            'paginate' => 'nullable|numeric',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new ValidationException($validator->errors());
    }
}
