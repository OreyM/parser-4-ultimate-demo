@isset(session('success')['toast'])
    <script>
        window.onload = () => {
            cuteToast({
                type: 'success',
                message: '{{ session('success')['toast'] }}',
                timer: 5000
            })
        }
    </script>
@endisset

@isset(session('info')['toast'])
    <script>
        window.onload = () => {
            cuteToast({
                type: 'info',
                message: '{{ session('info')['toast'] }}',
                timer: 5000
            })
        }
    </script>
@endisset

@isset(session('warning')['toast'])
    <script>
        window.onload = () => {
            cuteToast({
                type: 'warning',
                message: '{{ session('warning')['toast'] }}',
                timer: 5000
            })
        }
    </script>
@endisset

@isset(session('error')['toast'])
    <script>
        window.onload = () => {
            cuteToast({
                type: 'error',
                message: '{{ session('error')['toast'] }}',
                timer: 5000
            })
        }
    </script>
@endisset
