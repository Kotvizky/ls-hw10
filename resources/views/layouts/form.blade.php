<div class="panel panel-default">
    <div class="panel-heading">{{$form['title']}}</div>

    <div class="panel-body">
        <form class="form-horizontal"
            @foreach($form['attributes'] as $key => $value)
                {{$key}} = "{{$value}}"
            @endforeach
            role="form" >

            {{csrf_field()}}

            @foreach ($fields as $field)
                @if ($field['type'] == 'text')
                    <div class="form-group{{ $errors->has( $field['name'] ) ? ' has-error' : '' }}">
                        <label for="name" class="col-md-2 control-label">{{$field['label']}}</label>
                        <div class="col-md-8">
                            <input id="{{$field['name']}}" type="text" class="form-control" name="{{$field['name']}}"
                                   value="{{ old($field['name'],$field['value']) }}" required autofocus>

                            @if ($errors->has($field['name']))
                                <span class="help-block">
                                                <strong>{{ $errors->first($field['name']) }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                @endif

                    @if ($field['type'] == 'number')
                        <div class="form-group{{ $errors->has( $field['name'] ) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{$field['label']}}</label>
                            <div class="col-md-8">
                                <input id="{{$field['name']}}" type="number" class="form-control" name="{{$field['name']}}"
                                       value="{{ old($field['name'],$field['value']) }}"
                                       step="0.01"
                                       required autofocus>

                                @if ($errors->has($field['name']))
                                    <span class="help-block">
                                                <strong>{{ $errors->first($field['name']) }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                    @endif


                @if($field['type'] == 'textarea')
                    <div class="form-group{{ $errors->has($field['name']) ? ' has-error' : '' }}">
                        <label for="desc" class="col-md-2 control-label">{{$field['label']}}</label>
                        <div class="col-md-8">
                            <textarea id="{{$field['name']}}" name = "{{$field['name']}}" type="text" class="form-control"
                                 cols=30 rows=5 name="desc" required>{{ old($field['name'],$field['value']) }}</textarea>
                            @if ($errors->has($field['name']))
                                <span class="help-block"><strong>{{ $errors->first($field['name']) }}</strong></span>
                            @endif
                        </div>
                    </div>
                @endif

                @if($field['type'] == 'checkbox')
                    <div class="form-group">
                        <label for="admin" class="col-md-2 control-label">{{$field['label']}}</label>
                        <div class="col-md-8">
                            <input type="checkbox" id="{{$field['name']}}" name="{{$field['name']}}" value="1"
                                    @if (old($field['name'],$field['value'])==1)
                                        checked
                                    @endif
                            >
                        </div>
                    </div>
                @endif


                @if($field['type'] == 'select')
                    <div class="form-group{{ $errors->has($field['name']) ? ' has-error' : '' }}">
                        <label for="{{$field['name']}}" class="col-md-2 control-label">{{$field['label']}}</label>
                        <div class="col-md-8">
                        <select id="{{$field['name']}}" name = "{{$field['name']}}" value = "2"
                                type="text" class="form-control"  required>
                            <?php $fieldValue =$field['value']; $fieldText = $field['text'] ?>
                            @foreach($field['table'] as $item)
                                <option
                                    @if ($item->$fieldValue == old($field['name'],($field['selected'])))
                                        selected
                                    @endif
                                    value="{{$item->$fieldValue}}">{{$item->$fieldText}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                @endif


                @if ($field['type'] == 'img')
                    <div class="form-group{{ $errors->has( $field['name'] ) ? ' has-error' : '' }}">
                        <label for="name" class="col-md-2 control-label">{{$field['label']}}</label>
                        <div class="col-md-8">
                            @if ($field['photo'] == '')
                                <p class="form-control">"Нет фото"</p>
                            @else
                                {{--{{dd($field['photo'])}}--}}
                                <img src="{{ $field['path'] . $field['photo'] }}" width="450" alt="Фото">
                            @endif

                        </div>
                    </div>
                @endif


            @endforeach

            @if(isset($form['file']))
                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                    <input type="file" name = "userFile" accept="image/jpeg" hidden>
                </div>
            @endif

            <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        {{$form['submit']}}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>