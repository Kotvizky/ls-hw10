<div class="panel panel-default">
    <div class="panel-heading">{{$title}}</div>
    <div class="col-md-6 ">
        <a href  = "{{$button['href']}}" class = "btn btn-primary">{{$button['text']}}</a>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                @foreach($table['head'] as $title)
                <th>{{$title}}</th>
                    @endforeach
            </tr>
            </thead>

            {{--@foreach($categories as $category)--}}

            @foreach($table['rows'] as $row)
                <tr>
                    @foreach($table['fields'] as $field)
                        @if(isset($field['img']))
                            <?php $photoField = $field['fieldName']; ?>
                            @if($row->$photoField == '')
                                <td>Нет фото</td>
                            @else
                                <td> <img src ="{{ $field['img'] . $row->$photoField}}" width="100"> </td>
                            @endif
                        @else
                            <td>{{$row->$field}}</td>
                        @endif
                    @endforeach

                    <td><a href="{{$action['edit']}}/{{$row->id}}"
                           class="btn btn-default"
                           role="button" title="редактировать">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <form action="{{$action['destroy']}}/{{$row->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn  btn-default" title="удалить">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
        @if(isset($pages))
            {{ $pages }}
        @endif

    </div>
</div>