<?php
include('inc.php');

$autoload = require('./../ORMLike/Autoload.php');
$autoload->register();

use \ORMLike\Database as Database;
use \ORMLike\Configuration as Configuration;
use \ORMLike\Database\Query\Builder as QueryBuilder;

$cfg = [
    'agent' => 'mysqli',
    'profiling' => true,
    'database' => [
        'fetch_type' => 'object',
        'charset'    => 'utf8',
        'timezone'   => '+00:00',
        'host'       => 'localhost',
        'name'       => 'test',
        'username'   => 'test',
        'password'   => '********',
    ]
];

$db = Database\Factory::build(new Configuration($cfg));
$db->connect();

$qb = new QueryBuilder($db->getConnection());
$qb->setTable('users');

// $qb->select('id,name');
// $qb->select('id,name')->where('id=?', [1]);
// $qb->select('id,name')->where('id=?', [1])->whereLike('AND name=?', ['Kerem']);
// $qb->select('id,name')->whereLike('id=? AND name=?', ['1%', '%Ke_rem%']);
// $qb->select('id,name')->where('id=?', [1])->whereLike('(id LIKE ? OR name LIKE ?)', ['2%', '%Ke_rem%'], $qb::OP_OR);

// $qb->select('id,name')
//     ->where('id=?', [1])
//     ->where('(name=? OR name=? OR old BETWEEN %d AND %d)', ['Kerem', 'Murat', 30, 40], $qb::OP_AND)
// ;

// $qb->select()->aggregate('count');

// $qb->select('u.*, up.point')
//     ->aggregate('sum', 'up.point', 'sum_point')
//     ->joinLeft('users_point up', 'up.user_id=u.id')
//     ->groupBy('u.id')
//     ->orderBy('old')
//     ->having('sum_point > ?', [30])
//     ->limit(0,10)
// ;

// pre($qb->toString());

// pre($qb->get());
// pre($qb->getAll());

$qb->insert(['name' => 'Veli', 'old' => 25]);
$qb->insert([['name' => 'Veli', 'old' => 25], ['name' => 'Deli', 'old' => 29]]);
pre($qb->toString());

// pre($qb->execute());
// pre($qb->execute()->getData());

pre($qb);
pre($qb->toString());
// pre($db);
