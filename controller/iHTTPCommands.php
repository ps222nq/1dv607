<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-13
 * Time: 10:23
 */
namespace controller;

interface iURICommand {
    const COMMAND_PREFIX = '?command=';

    const LIST_COMMAND =  'list';
    const LIST_VERBOSE_COMMAND = 'detailed_list';

    const ADD_MEMBER_COMMAND = 'add_member';
    const DELETE_MEMBER = 'delete_member';
    const UPDATE_MEMBER = 'update_member';

    const ADD_ASSET = 'add_asset';
    const UPDATE_ASSET = 'update_asset';
    const DELETE_ASSET = 'delete_asset';
    const ASSET_NUMBER_PREFIX = '&assetNumber=';
    const ASSET_NUMBER = 'assetNumber';

    const ID_PREFIX = '&id=';
    const ID = 'id';
}
