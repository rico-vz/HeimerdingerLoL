<script async src="https://www.googletagmanager.com/gtag/js?id={{ config('app.GTAG_MEASUREMENT_ID') }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ config('app.GTAG_MEASUREMENT_ID') }}');
</script>
