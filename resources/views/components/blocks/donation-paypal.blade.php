<div class="overflow-hidden bg-teal-700 shadow-xl rounded-xl">
    <div class="relative px-4 py-12 mx-auto max-w-prose sm:px-6 lg:px-8 lg:py-24">
        <h1 class="text-3xl font-bold text-white sm:text-4xl">
            {{ $title }}
        </h1>

        <div class="mt-4 prose text-white max-w-prose sm:prose-lg">
            {!! $text !!}
        </div>

        <x-button
            class="mt-8 text-teal-700 bg-white border border-transparent hover:bg-gray-50 focus:ring-offset-teal-700 focus:ring-white"
            href="https://www.paypal.com/donate?hosted_button_id={{ $button_id }}"
            icon="ri-paypal-line"
            size="xl">
            @lang('donation.action.paypal')
        </x-button>
    </div>
</div>
