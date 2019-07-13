<?php

?>


<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">

    <input type="text" name="name" />
    <input type="file" name="image" />


    <input type="submit" value="Upload Now">

</form>
