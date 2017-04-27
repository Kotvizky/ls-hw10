<div class="panel panel-default">
    <div class="panel-heading">{{$form['title']}}</div>

    <div class="panel-body">
        <form class="form-horizontal" role="form" action="{{$form['action']}}" method="{{$form['method']}}">
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

                @if($field['type'] == 'textarea')
                    <div class="form-group{{ $errors->has($field['name']) ? ' has-error' : '' }}">
                        <label for="desc" class="col-md-2 control-label">{{$field['label']}}</label>
                        <div class="col-md-8">
                            <textarea id="desc" type="text" class="form-control"
                                 cols=30 rows=5 name="desc" required>{{ old($field['name'],$field['value']) }}</textarea>
                            @if ($errors->has($field['name']))
                                <span class="help-block"><strong>{{ $errors->first($field['name']) }}</strong></span>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
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