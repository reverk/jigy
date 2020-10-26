<style>
    div label input {
        margin-right:100px;
    }

    #ck-button {
        margin:4px;
        overflow:auto;
        float:left;
    }

    #ck-button label span {
        text-align:center;
        display:block;
        border-radius: 100px;
        font-size: 16px;
        font-weight: lighter;
        background: #C3FFF8;
        box-shadow: 1px 3px 5px grey;
        padding: 10px;
    }

    #ck-button label input {
        position:absolute;
        top:-20px;
    }

    #ck-button input:hover + span {
        background-color: #d2f1f1;
    }

    #ck-button input:checked + span {
        background-color:#B9ECE6;
    }

    #ck-button input:checked:hover + span {
        background-color: #d2f1f1;
    }
</style>
<div id="ck-button" class="p-2 mx-2">
    <label class="">
        <input type="checkbox" value="1" class="" hidden><span>{{$name}}</span>
    </label>
</div>
