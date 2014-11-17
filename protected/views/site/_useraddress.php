<?php var_dump($cachedUser); ?>

<?php $cached = !empty($cachedUser) && !empty($cachedAddress); ?>

<?php if ($cached): ?>
<input type="hidden" name="User[id]" value="<?php $cachedUser->id; ?>">
<?php endIf; ?>
<div class="cart-module">
    <div>
        <div class="cart-heading active">User:</div>
        <div class="cart-content" style="display: block;">
            <table id="shipping">
                <tbody>
                    <tr>
                        <td>
                            <label for="name">Name:  <input style="width:400px" maxlength="255" type="text" name="User[name]" id="name" value="<?php echo $cached ? $cachedUser->name : ''; ?>" /></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="sex">Sex: 
                                <select id="sex" name="User[sex]">
                                    <option value="F" <?php echo $cached && $cachedUser->sex =='F' ? 'selected'  : ''; ?>>F</option>
                                    <option value="M" <?php echo $cached && $cachedUser->sex =='M' ? 'selected'  : ''; ?>>M</option>
                                </select>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:  <input style="width:400px" maxlength="255" type="text" name="User[email]" id="email" value="<?php echo $cached ? $cachedUser->email : ''; ?>" /></label>
                        </td>
                    </tr>
                    <?php if (!$cached): ?>
                    <tr>
                        <td>
                            <label for="password">Password:  <input style="width:400px" maxlength="10" type="password" name="User[password]" id="password" value="" /></label>
                        </td>
                    </tr>
                    <?php endIf; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="cart-module">
    <div>
        <div class="cart-heading active">Enter your destination:</div>
        <div class="cart-content" style="display: block;">
            <table id="shipping">
                <tbody>
                    <tr>
                        <td>
                            <label for="name">Street:  <input style="width:400px" maxlength="255" type="text" name="Address[street]" id="street" value="<?php echo $cached ? $cachedAddress->street : ''; ?>" /></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">City:  <input style="width:220px" maxlength="255" type="text" name="Address[city]" id="city" value="<?php echo $cached ? $cachedAddress->city : ''; ?>" /></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Zip Code:  <input style="width:150px" maxlength="9" type="text" name="Address[zip_code]" id="zip_code" value="<?php echo $cached ? $cachedAddress->zip_code : ''; ?>" /></label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
