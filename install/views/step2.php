<?php
if(!Session::exists('db-server')){
    Redirect::to("?path=introduction");
}
?>
<h1>Step 2 - Facebook Application Details</h1>
<div id="column-right">
    <ul>
        <li>
            Introduction
        </li>
        <li>
            Server Configuration
        </li>
        <li>
            <b>Facebook Application</b>
        </li>
        <li>
            Finished
        </li>
    </ul>
</div>
<div id="content">
    <div id="loading"></div>
    <div class="warning" id="warning"></div>
    <form id="step2">
        <p>
            <b>Please enter your Facebook Application Details</b>
        </p>
        <fieldset>
            <table class="form">
                <tr>
                    <td><span class="required">*</span> Facebook Application ID:</td>
                    <td>
                    <input type="text" name="fb-app-id"/>
                    <br />
                    </td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Facebook Application Secret:</td>
                    <td>
                    <input type="text" name="fb-app-secret-id"/>
                    <br />
                    </td>
                </tr>
            </table>
        </fieldset>
        <div class="buttons">
            <div class="left">
                <a href="?path=step1" class="button">Back</a>
            </div>
            <div class="right">
                <input type="submit" value="Continue" class="button" />
            </div>
        </div>
    </form>
</div>