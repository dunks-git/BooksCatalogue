<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue</title>
    <script src="{{ asset('js/vue3.js') }}"></script>

</head>
<body>
<div id="app">
    ${ message }
</div>

<script type="module">
    var vuapp = Vue.createApp({
        data() {
            return {
                message: 'Hello Vue!',
            }
        },
    })
    vuapp.config.compilerOptions.delimiters = ['${', '}']
    vuapp.mount('#app')
</script>

</body>
</html>

