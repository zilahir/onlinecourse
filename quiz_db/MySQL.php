<?php
use \mysqli;

class MySQL {
    private static $mysql_connection;

    /** mysql connection open
     * @return bool
     */
    static function connect() {
        $mysqlDatas = require(__DIR__ . "/configClass.php");
        self::$mysql_connection = new mysqli($mysqlDatas["mysql_host"], $mysqlDatas["mysql_username"], $mysqlDatas["mysql_password"], $mysqlDatas["mysql_database"]);
        self::$mysql_connection->set_charset("utf8");
        return mysqli_connect_errno();
    }

    /** mysql query
     * @param $query is a query for mysql
     * @return bool
     */
    static function query($query) {
        return mysqli_query(self::$mysql_connection, $query);
    }

    /** mysql insert
     * @param $table is a mysql table
     * @param $array contains the values of insert query
     * @return bool
     */
    static function insert($table, $array) {
        $query = "INSERT INTO " . $table . " VALUES('',DATE_FORMAT(NOW(),'%Y-%m-%d %T'),";

        for ( $i=0; $i<count($array); $i++ ) {
            $query.="'".$array[$i]."'";
            if ( $i == count($array)-1 ) {
                $query.=")";
            } else {
                $query.=",";
            }
        }

        return self::query($query);
    }

    static function insertWithKeys($table, $array) {
        $query = "INSERT INTO " . $table . "(id, ";

        $i=0;
        foreach ( $array as $key => $value ) {
            $query = $query . $key;
            if ( $i == count($array)-1 ) {
                $query.=")";
            } else {
                $query.=",";
            }
            $i++;
        }

        $query = $query . " VALUES('', ";

        $i=0;
        foreach ( $array as $key => $value ) {
            $query = $query . "'" . $value . "'";
            if ( $i == count($array)-1 ) {
                $query.=")";
            } else {
                $query.=",";
            }
            $i++;
        }

        //echo $query;

        return self::query($query);
    }

    static function insertIntoGroup($table, $array) {
        $query = "INSERT INTO " . $table . "( `";

        $i=0;
        foreach ( $array as $key => $value ) {
            $query = $query . $key;
            if ( $i == count($array)-1 ) {
                $query.="`)";
            } else {
                $query.="`,`";
            }
            $i++;
        }

        $query = $query . " VALUES( ";

        $i=0;
        foreach ( $array as $key => $value ) {
            $query = $query . "'" . $value . "'";
            if ( $i == count($array)-1 ) {
                $query.=")";
            } else {
                $query.=",";
            }
            $i++;
        }

        //echo $query;

        return self::query($query);
    }


    static function insertNoId($table, $array) {
        $query = "INSERT INTO " . $table . " VALUES(";

        for ( $i=0; $i<count($array); $i++ ) {
            $query.="'".$array[$i]."'";
            if ( $i == count($array)-1 ) {
                $query.=")";
            } else {
                $query.=",";
            }
        }
        //echo $query;
        return self::query($query);
    }

    /** mysql query
     * @param $query is a query for mysql
     * @return array()
     */
    static function getRows($query) {
        $array = array();

        if ( $result = self::$mysql_connection->query($query) ) {
            while ( $row = $result->fetch_object() ) {
                $array[] = $row;
            }
            $result->close();
        }

        return $array;
    }

    static function getValues($query, $value) {
        $array = array();

        if ( $result = self::$mysql_connection->query($query) ) {
            while ( $row = $result->fetch_object() ) {
                $array[] = $row->$value;
            }
            $result->close();
        }

        return $array;
    }

    static function update($table, $id, $array) {
        $query = "UPDATE " . $table . " SET ";
        $i=0;
        foreach ( $array as $key => $value ) {
            if ( $value == "" ) {
                $query = $query . $key . "=NULL";
            } else {
                $query = $query . $key . "='" . $value . "'";
            }
            if ( $i != count($array)-1 ) {
                $query = $query . ",";
            }
            $i++;
        }
        $query = $query . " WHERE id=" . $id . ";";

        return self::query($query);
    }

    static function delete($table, $id) {
        $query = "DELETE FROM " . $table . " WHERE id='" . $id . "';";

        return self::query($query);
    }

    static function isInTable($table, $key, $value) {
        $query = "SELECT * FROM " . $table . " WHERE " . $key . "='" . $value . "';";
        return count(self::getRows($query)) != 0;
    }

    static function countRow($table, $key, $value, $range) {
        $query = "SELECT id FROM " . $table . " WHERE " . $key . "='" . $value . "' AND timestamp between '" . $range[0] . "' AND '" . $range[1] .  "';";
        //echo $query;
        return count(self::getRows($query)) ;
    }

    static function countEntry($table, $key, $value) {
        $query = "SELECT id FROM " . '`'.$table.'`' . " WHERE " . '`'.$key.'`' . "='" . $value . "' ;";
        //echo $query;
        return count(self::getRows($query)) ;
    }

    static function countEverything($table, $key, $value) {
        $query = "SELECT id FROM " . '`'.$table.'`' . " WHERE " . '`'.$key.'`' . " LIKE '" . $value . "' ;";
        //echo $query;
        return count(self::getRows($query)) ;
    }

    // TODO WRITE STATIC FUNCTION FOR COUNTING SQL ENTRIES

    static function getAllColumns($query) {
        //echo $query;
        return self::getRows($query) ;
    }

    static function getNumberOfBuilds($table, $key, $value, $value2, $range) {
        $query = "SELECT id FROM " . $table . " WHERE (" . $key . "='" . $value . "' OR " . $key . "='" . $value2 . "') AND timestamp between '" . $range[0] . "' AND '" . $range[1] .  "';";
        //echo $query;
        //$query = "SELECT id FROM " . $table . " WHERE " . $key . "='" . $value . "' AND timestamp between '" . $range[0] . "' AND '" . $range[1] .  "';";
        return count(self::getRows($query)) ;

    }

    static function getRowWithAttr($table, $key, $value) {
        $query = "SELECT * FROM " . $table . " WHERE " . $key . "='" . $value . "';";
        $row = MySQL::getRows($query);
        return count($row)>0 ? reset($row) : null;
    }

    static function multiQuery($query) {
        if ( mysqli_multi_query(self::$mysql_connection, $query) ) {
            do {
                if ($result = mysqli_store_result(self::$mysql_connection)) {
                    mysqli_free_result($result);
                }
            } while (mysqli_more_results(self::$mysql_connection) && mysqli_next_result(self::$mysql_connection));

            return true;
        } else {
            return false;
        }
    }

    /** mysql connection close
     * @return bool
     */
    static function close() {
        return mysqli_close(self::$mysql_connection);
    }
}
?>
