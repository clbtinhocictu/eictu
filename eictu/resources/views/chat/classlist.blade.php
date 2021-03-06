@extends('/layouts/app')
@section('content')
    <?php
    $user_id = Auth::user()->username;
    $type = Auth::user()->type;
            if ($type != 2 || $type != 1){
                redirect('chat/error');
            }
    ?>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" id="purple">
            <h4>Các phòng chat theo lớp học</h4>

        </div>

    </div>

    <div class="row">
        <div class="col-sm-5 col-sm-offset-3">
            <br>
            <ol>
                <?php
                $classes = DB::table('classes')->get();
                foreach ($classes as $class) {
                    $class_name = $class->name;

                    echo "<li id='cla'><a href='classroom?c=$class_name&id=$user_id'>$class_name</a></li>";
                }
                ?>
            </ol>

        </div>
    </div>
@stop
