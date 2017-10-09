@extends('layouts.app')

@push('head')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.3.1/swagger-ui.css" >
@endpush

@section('content')
<div id="swagger-ui"></div>
<style media="screen">
    #swagger-ui .server-container,
    #swagger-ui .topbar {
        display: none;
    }
    #swagger-ui h2 pre {
        background-color: transparent;
        border: none;
    }
</style>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.3.1/swagger-ui-bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.3.1/swagger-ui-standalone-preset.js"></script>
    <script>
    window.onload = function() {
      const ui = SwaggerUIBundle({
        dom_id: '#swagger-ui',
        url: "{{ secure_url('api/v1/open-api-specification.yml') }}",
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
