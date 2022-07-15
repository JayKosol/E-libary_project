<?php
declare(strict_types=1);

function insertData($pdo,$sql,$data):bool{
    if(count($data)==0) return false;
    if($stmt=$pdo->prepare($sql)){

        if($stmt->execute($data)){
            return true;
        }
        return false;
    }

}

//fill author
function fill_author($connect)
{
    //WHERE author_status = 'Enable'
	$query = "
	SELECT authorName FROM authors 
	ORDER BY authorName ASC
	";

	$result = $connect->query($query);

	$output = '<option value="">Select Author</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["authorName"].'">'.$row["authorName"].'</option>';
	}

	return $output;
}
//fill category
function fill_category($connect)
{
    //WHERE category_status = 'Enable' 
	$query = "
	SELECT categoryName FROM category 
	
	ORDER BY categoryName ASC
	";

	$result = $connect->query($query);

	$output = '<option value="">Select Category</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["categoryName"].'">'.$row["categoryName"].'</option>';
	}

	return $output;
}

//count book number
function total_book($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(book_id) AS Total FROM lms_book 
	WHERE book_status = 'Enable'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}
//count total author
function total_author($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(author_id) AS Total FROM lms_author 
	WHERE author_status = 'Enable'
	";

	$result  = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}
//count total category
function total_category($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(category_id) AS Total FROM lms_category 
	WHERE category_status = 'Enable'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}
	return $total;
}