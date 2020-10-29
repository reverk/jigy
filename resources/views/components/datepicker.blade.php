<style>
    .radius{
        border-radius: 100px;
    }
</style>
<div class="input-group border radius">
    <div class="input-group-prepend p-2 ">
        <span class="material-icons">calendar_today</span>
    </div>
    <input class="datepicker p-2 border-0 " data-date-format="mm/dd/yyyy" placeholder="{{$placeholder}}" name="date" id="date">
</div>
<script>
    $('.datepicker').datepicker({
        startDate: '-3d'
    });
</script>
