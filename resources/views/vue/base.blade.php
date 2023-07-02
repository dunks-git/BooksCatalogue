<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue</title>
    <script  src="{{ asset('js/vue3') }}"></script>

</head>
<body>
<div id="app">
    <example-component>greeting</example-component>
</div>
<script>

    Vue.createApp({
        delimiters: ["${", "}"],
        data(){
            return{
                greeting:'Hello World!'
            };
        }
    }).mount('#app');
</script>

</body>
</html>

