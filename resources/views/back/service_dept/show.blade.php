@foreach($result_page_ajaxs as $result_page_ajax)
<option value="{{$result_page_ajax->id}}">{{$result_page_ajax->name}}</option>
@endforeach