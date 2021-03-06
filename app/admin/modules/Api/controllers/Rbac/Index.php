<?php
class Rbac_IndexController extends Base\ApiController
{
    public function getAction()
    {
        $data = $this->model->get();
        foreach ($data as &$v) {
            $v['role_id'] = \Rbac\RoleModel::getInstance($v['role_id'])->get(APP_LANG_ID)['name'];
            $v['type'] = l($this->_request->controller.'.typeSelect.'.$v['type']);
            $v['status'] = l('status.'.$v['status']);
        }
        return $this->send($data);
    }
}