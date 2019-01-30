<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/18/2016
 * Time: 6:18 PM
 */

?>
<html>
<div class="register">
<form>
  <legend>Title</legend>
  <div class="mui-textfield">
    <input type="text" required>
    <label>Required Text Field</label>
  </div>
  <div class="mui-textfield mui-textfield--float-label">
    <input type="email" required>
    <label>Required Email Address</label>
  </div>
  <div class="mui-textfield mui-textfield--float-label">
    <textarea required></textarea>
    <label>Required Textarea</label>
  </div>
  <div class="mui-textfield mui-textfield--float-label">
    <input type="email" value="Validation error">
    <label>Email Address</label>
  </div>
  <button type="submit" class="mui-btn mui-btn--raised">Submit</button>
</form>
</div>
</html>