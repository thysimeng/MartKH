@if($sidebar==0)
    <footer class="footer">
@elseif($sidebar==1)
    <footer class="footer bg-dark">
@endif
        @include('layouts.footers.nav')
    </footer>
