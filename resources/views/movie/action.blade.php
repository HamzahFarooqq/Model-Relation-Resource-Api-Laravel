<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
</div>

{{-- <div> {{$fruit}} </div> --}}
{{-- <div> {{$line2}} </div>
<div> {{$line3}} </div> --}}
<div> <?php //echo $line1 . $line2 ; ?> </div>



<form action="{{url('/upload')}}" enctype="multipart/form-data" method="POST">

<div>
    <label for="">file to upload</label>
    <input type="file" name="image" id="">
    <button >submit</button>
</div>


</form>