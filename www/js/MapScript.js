/*
RefreshFilters: Updates the map marker objects based on the filter selected.
Each map marker and filter have a table and referenceID. Table IDs show whether the filter is a historic or type filter.
Team Garnet Notes: Table ID filter tracking allows for future implementation of multiple filter selection.
 */
function refreshFilters(table, referenceID) {
    //close any opened info windows
    infoWindow.close();
    // Loop through markers and set map to null for each
    for (var i = 0; i < allMarkerObjects.length; i++) {
        allMarkerObjects[i].setVisible(false);

        if (table == "historicFilter" && allMarkerObjects[i].idHistoricFilter == referenceID) {
            allMarkerObjects[i].setVisible(true);
        } else if (table == "typeFilter" && allMarkerObjects[i].idTypeFilter == referenceID) {
            allMarkerObjects[i].setVisible(true);
        }
    }
}

/*
ResetFilters: Updates all the map markers to reshow on the map.
*/
function resetFilters() {
    for (var i = 0; i < allMarkerObjects.length; i++) {
        allMarkerObjects[i].setVisible(true);
    }
}