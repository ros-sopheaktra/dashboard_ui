{{-- footer of dashboard --}}
<footer class="footer mt-auto">
    <div class="copyright bg-white">
        <p>
            &copy; <span id="copy-year"></span> Power by <a
                class="text-primary" href="https://www.vicheasolutions.com/" target="_blank">Vichea Solutions</a>.
        </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</footer>