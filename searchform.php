<form action="<?php echo home_url( '/' ) ?>" method='get' class='form'>
    <label class="screen-reader-text" for="s">Что вы ищете? </label>
    <input type='text'  value="<?php echo get_search_query() ?>" name="s" id="s" placeholder='Что вы ищите?' />
    <input type="hidden" value="product" name="post_type" />
    <button type='submit'></button>
</form>
