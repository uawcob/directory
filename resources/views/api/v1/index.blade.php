@extends('layouts.app')

<?php $title = 'Directory API v1 Documentation'; ?>

@push('head')
  <link rel="stylesheet" type="text/css" href="{{ l5_swagger_asset('swagger-ui.css') }}" >
@endpush

@section('content')
<div id="swagger-ui"></div>
<style media="screen">
    #swagger-ui .topbar,
    #swagger-ui h2>small {
        display: none;
    }
    #swagger-ui .scheme-container {
        box-shadow: initial;
        -webkit-box-shadow: initial;
    }
</style>
@endsection

@push('scripts')
    <script src="{{ l5_swagger_asset('swagger-ui-bundle.js') }}"> </script>
    <script src="{{ l5_swagger_asset('swagger-ui-standalone-preset.js') }}"> </script>
    <script>
    window.onload = function() {
      // Build a system
      const ui = SwaggerUIBundle({
        dom_id: '#swagger-ui',

        url: "{!! $urlToDocs !!}",
        operationsSorter: {!! isset($operationsSorter) ? '"' . $operationsSorter . '"' : 'null' !!},
        configUrl: {!! isset($additionalConfigUrl) ? '"' . $additionalConfigUrl . '"' : 'null' !!},
        validatorUrl: {!! isset($validatorUrl) ? '"' . $validatorUrl . '"' : 'null' !!},
        oauth2RedirectUrl: "{{ route('l5-swagger.oauth2_callback') }}",

        presets: [
          SwaggerUIBundle.presets.apis,
          SwaggerUIStandalonePreset
        ],

        plugins: [
          SwaggerUIBundle.plugins.DownloadUrl
        ],

        layout: "StandaloneLayout"
      })

      window.ui = ui
    }
    </script>
@endpush
