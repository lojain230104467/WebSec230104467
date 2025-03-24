<script>
 $(document).ready(function(){
 $("#btn1").click(function(){
 $("#btn2").show();
 });
 $("#btn2").click(function(){
 $("#ul1").append("<li>Hello</li>");
 });
});
</script>
<div class="card m-4">
 <div class="card-body">
 <button type="button" id="btn1" class="btn btn-primary" >Press Me</button>
 <button type="button" id="btn2" class="btn btn-success" style="display: none;" >Press Me Again</button>
 <ul id="ul1">
 </ul>
 </div>
</div>