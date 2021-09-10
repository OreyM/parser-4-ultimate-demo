@isset(session('success')['alert'])
    <script>
        window.onload = () => {
            cuteAlert({
                type: 'success',
                title: '{{ session('success')['alert']['title'] }}',
                message: '{{ session('success')['alert']['message'] }}',
                buttonText: 'Yep!'
            })
        }
    </script>
@endisset

@isset(session('info')['alert'])
    <script>
        window.onload = () => {
            cuteAlert({
                type: 'info',
                title: '{{ session('info')['alert']['title'] }}',
                message: '{{ session('info')['alert']['message'] }}',
                buttonText: 'Oki-Doki'
            })
        }
    </script>
@endisset

@isset(session('warning')['alert'])
    <script>
        window.onload = () => {
            cuteAlert({
                type: 'warning',
                title: '{{ session('warning')['alert']['title'] }}',
                message: '{{ session('warning')['alert']['message'] }}',
                buttonText: 'I\'m understand'
            })
        }
    </script>
@endisset

@isset(session('error')['alert'])
    <script>
        window.onload = () => {
            cuteAlert({
                type: 'error',
                title: '{{ session('error')['alert']['title'] }}',
                message: '{{ session('error')['alert']['message'] }}',
                buttonText: 'Fuck!'
            })
        }
    </script>
@endisset
