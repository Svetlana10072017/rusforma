@error($fieldName)
{{-- вывод информации с предупреждением --}}
<div class="alert alert-danger">{{ $message }}</div>
@enderror
{{-- переносим сообщение об ошибке сюда --}}
