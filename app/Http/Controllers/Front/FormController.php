<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\FormSubmissionRequest;
use App\Models\Form;
use App\Models\FormField;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class FormController extends Controller
{
    use SEOTools;

    public function show(string $locale, Form $form): View
    {
        $this->seo()
            ->setTitle($form->title)
            ->setDescription($form->description);

        return view('front.forms.show', [
            'form' => $form,
        ]);
    }

    public function submit(string $locale, FormSubmissionRequest $request, Form $form): JsonResponse
    {
        $attributes = $request->validated();

        $data = $form->blocks
            ->map(function (FormField $field) use ($attributes) {
                $value = $attributes[$field->name] ?? '&mdash;';

                if (\is_array($value)) {
                    $value = implode(', ', $value);
                }

                return [
                    'label' => $field->translatedInput('label'),
                    'value' => $value,
                ];
            })
            ->all();

        $form->processSubmission($data);

        return response()->json([
            'message' => __('form.event.sent'),
        ]);
    }
}
