<?php

namespace vendor\framework\Database;
use vendor\framework\Database\DB;

class Builder{
    protected $sql = '';
    protected $q_where = '';
    protected $q_innerjoin = '';
    protected $q_leftjoin = '';
    protected $q_rightjoin = '';
    protected $q_fulljoin = '';


    protected $queryTime;

    public function where($prop, $op, $value){
        if(strlen($this->q_where) > 0){
            $this->q_where .= " AND $prop $op '$value'";
        }else{
            $this->q_where .= " WHERE $prop $op '$value'";
        }
        return $this;
    }

    public function whereNull($prop){
        if(strlen($this->q_where) > 0){
            $this->q_where .= " AND $prop IS NULL";
        }else{
            $this->q_where .= " WHERE $prop IS NULL";
        }
        return $this;
    }

    public function rightJoin($table, $table1_prop, $op, $table2_prop){
        $this->q_rightjoin .= " RIGHT JOIN `$table` ON $table1_prop $op $table2_prop";
        return $this;
    }

    public function leftJoin($table, $table1_prop, $op, $table2_prop){
        $this->q_leftjoin .= " LEFT JOIN `$table` ON $table1_prop $op $table2_prop";
        return $this;
    }

    public function innerJoin($table, $table1_prop, $op, $table2_prop){
        $this->q_innerjoin .= " INNER JOIN `$table` ON $table1_prop $op $table2_prop";
        return $this;
    }

    public function fullJoin($table, $table1_prop, $op, $table2_prop){
        $this->q_fulljoin .= " FULL OUTHER JOIN `$table` ON $table1_prop $op $table2_prop";
        return $this;
    }

    public function get(){
        if(strlen($this->q_where) > 0){
            $this->sql .= $this->q_where;
        }
        if(strlen($this->q_leftjoin) > 0){
            $this->sql .= $this->q_leftjoin;
        }
        if(strlen($this->q_rightjoin) > 0){
            $this->sql .= $this->q_rightjoin;
        }
        if(strlen($this->q_innerjoin) > 0){
            $this->sql .= $this->q_innerjoin;
        }
        if(strlen($this->q_fulljoin) > 0){
            $this->sql .= $this->q_fulljoin;
        }

        $started = microtime(true);
        $query = DB::query($this->sql);
        $end = microtime(true);
        $difference = $end - $started;
        $this->queryTime = number_format($difference, 10);
        DB::$queries[] = $this->sql;
        $query->query_time = $this->queryTime;
        return  $query;
    }

}