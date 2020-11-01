<style>
    .radius{
        border-radius: 100px;
    }
</style>
<div class="input-group border radius">
    <div class="input-group-prepend p-2 ">
        <span class="material-icons">calendar_today</span>
    </div>
{{--
        FIXME: You can try these to simplify your code. No need to complicate things & rely on bootstrap all the time
        https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date
        https://stackoverflow.com/questions/14946091/are-there-any-style-options-for-the-html5-date-picker
--}}
    <input class="datepicker p-2 border-0 " data-date-format="mm/dd/yyyy" placeholder="{{$placeholder}}" >
</div>
<script>
    $('.datepicker').datepicker({
        startDate: '-3d'
    });
</script>
