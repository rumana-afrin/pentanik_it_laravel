@extends('frontend.layouts.web')
@section('content')
    <section class="FAQ-section">
        <div class="FAQ-title text-center p-2 pt-3">
            <h1>FAQ Page</h1>
        </div>
    </section>

    <section class="d-flex justify-content-center align-items-center mt-4">
        <div class="FAQ-content mb-4">
            @foreach ($faq as $item)
                <div class="p-2">
                    <h4>{{ $item->question }}</h4>
                    <p>{{ $item->answer }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('style')
    <style>
        .FAQ-content {
            min-height: 100vh;
        }
    </style>
@endpush

@push('script')
   
  <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

  
@endpush

