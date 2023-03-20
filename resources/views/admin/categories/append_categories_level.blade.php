<div class="form-group">
    <label class="form-label" for="parent_id">  التصنيف الاب</label>
    <div class="form-control-wrap ">
        <select class="form-select form-control form-control-lg valid" id="parent_id" name="parent_id" data-placeholder="Select a option" aria-invalid="false">
            <option value="0" @if (isset($category['parent_id']) && $category['parent_id'] == 0)
                selected = ""@endif>-- التصنيف الرئيسي   -- </option>
            @if (!empty($getCategories))
                @foreach ($getCategories as $parentcategory)
                     <option value="{{$parentcategory['id']}}" @if (isset($category['parent_id']) && $category['parent_id'] == $parentcategory['id'])
                     selected = ""@endif>{{$parentcategory['category_name']}}</option>
                     @if (!empty($parentcategory['subcategories']))
                        @foreach ($parentcategory['subcategories'] as $subcategory)
                            <option value="{{$subcategory['id']}}" @if (isset($subcategory['parent_id']) && $subcategory['parent_id'] == $subcategory['id'])
                            selected = ""@endif>-- {{$subcategory['category_name']}}</option>
                        @endforeach
                     @endif
                @endforeach
            @endif
            
        </select>
    </div>
</div>