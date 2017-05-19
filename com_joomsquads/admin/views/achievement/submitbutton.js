Joomla.submitbutton = function (task)
{
    if (task == '')
    {
        return false;
    }
    else
    {
        var isValid = true;
        var action = task.split('.');
        if (action[1] != 'cancel' && action[1] != 'close')
        {
            var f = document.adminForm;
            if (!document.formvalidator.isValid(f)) {
                isValid = false;
            }
        }

        if (isValid)
        {
            Joomla.submitform(task);
            return true;
        }
        else
        {
            alert(Joomla.JText._('COM_JOOMSQUADS_INVALID_VALUE',
                    'Some values are unacceptable'));
            return false;
        }
    }
}