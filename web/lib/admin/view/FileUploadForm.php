<?php
namespace web\lib\admin\view;

use web\lib\admin\http\AddUsersCommand;
use web\lib\admin\http\SilverbulletController;

/**
 * 
 * @author Zilvinas Vaira
 *
 */
class FileUploadForm extends AbstractForm{
    
    /**
     * 
     * @param SilverbulletController $controller
     * @param string $description
     */
    public function __construct($controller, $description) {
        parent::__construct($controller, $description);
        $controller->distributeMessages(AddUsersCommand::COMMAND, $this->messageBox);
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \web\lib\admin\view\PageElementInterface::render()
     */
    public function render(){
        ?>
        <div>
            <form enctype="multipart/form-data" method="post" action="<?php echo $this->action;?>" accept-charset="utf-8">
                <div class="<?php echo AddNewUserForm::ADDNEWUSER_CLASS; ?>">
                    <?php $this->messageBox->render(); ?>
                    <p><?php echo $this->description; ?></p>
                    <div style="margin: 5px 0px 10px 0px;">
                        <input type="file" name="<?php echo AddUsersCommand::COMMAND; ?>">
                    </div>
                    <button type="submit" name="command" value="<?php echo AddUsersCommand::COMMAND; ?>" ><?php echo _('Import users'); ?></button>
                </div>
            </form>
        </div>
        <?php
    }
    
}
