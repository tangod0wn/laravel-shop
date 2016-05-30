<div>

  <ul id="treeview" class="treeview">


  @foreach($categories as $category) 
    @if($category->parent_id == 0 )
        <li><a href="javascript:void 0" onclick="TreeMenu.toggle(this)">{{  $category->name }}<span class="pull-right category-right-arrow"><i class="fa fa-angle-right"></i></span></a>

            @if($category_with_parent_id->count())
                <ul>
                @foreach($category_with_parent_id as $subcat)
                    @if($subcat->parent_id == $category->id)
                    <li><a href="{{ route('products.show', ['id' => $subcat->id ]) }}">{{ $subcat->name }}</a></li>                                     
                    @endif
                @endforeach
                </ul>
            @endif            

        </li>
    @endif
   @endforeach
    
  </ul>
  <script type="text/javascript">
    make_tree_menu('treeview', 1, 0, 1);
  </script>

</div>