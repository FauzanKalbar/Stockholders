//
Select tbl_stocks.lname, tbl_stocks.fname, sum(tbl_votes.amount) as result From tbl_votes, tbl_stocks Where tbl_votes.candidate_id=tbl_stocks.id and tbl_votes.is_temp='No' GROUP BY tbl_votes.candidate_id
// for resolutions
Select tbl_res_votes.res_id, tbl_resolutions.res_name, sum(tbl_res_votes.vote_yes) as infavor, sum(tbl_res_votes.vote_no) as nif, sum(tbl_res_votes.vote_abstain) as abstain From tbl_res_votes, tbl_resolutions Where tbl_res_votes.res_id=tbl_resolutions.id GROUP By tbl_res_votes.res_id ORDER BY tbl_res_votes.id ASC